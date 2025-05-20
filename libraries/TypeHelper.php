<?php

class TypeHelper
{
    public static function getTypeConfig()
    {
        //TODO Please fill-in the info of Type
        return [
            'type_name' => [ //type name(API endpoint)
                'name' => '', //displayname of the type which will be on page <h1>
                'icon' => 'fas fa-fw fa-calendar-day',
                'cols' => [
                    //cols to display on collection 
                ],
                'default_aggs' => [
                    //field to be aggs with which will be display on left of the list table
                ],
                'item_features' => [
                    //format: 'endpoint' => 'tab-name',
                    //pages of an doc, page view will be at /views/collection/{type_name}_{endpoint}.php
                ],
            ],
        ];
    }

    public static function getColumns($type)
    {
        $config = self::getTypeConfig();
        return $config[$type]['cols'] ?? [];
    }

    public static function getDataColumn($type)
    {
        $type = str_replace('_', '', $type);
        return $type . 's';
    }

    public static function getDataByID($type, $id)
    {
        $ret = Api::apiQuery("/{$type}/" . urlencode($id), "抓取 {$type} 的 {$id} 資料");
        return $ret;
    }

    public static function getData($data, $type)
    {
        return $data->{self::getDataColumn($type)} ?? [];
    }

    public static function getAPIURL($type)
    {
        $url = 'https://' . getenv('API_HOST');
        return "{$url}/{$type}s";
    }

    public static function getDataFromAPI($type)
    {
        $agg = self::getCurrentAgg($type);
        $url = self::getAPIURL($type);
        $terms = [];
        foreach ($agg as $field) {
            $terms[] = "agg=" . urlencode($field);
        }
        if ($terms) {
            $url .= '?' . implode('&', $terms);
        }
        return Api::apiQuery($url, "抓取 {$type} 的資料");
    }

    public static function getCurrentFilter()
    {
        $config = self::getTypeConfig();
        $query_string = $_SERVER['QUERY_STRING'];
        $terms = explode('&', $query_string);
        $filter = [];
        foreach ($terms as $term) {
            list($k, $v) = array_map('urldecode', explode('=', $term));
            if ($k === 'filter') {
                $filter[] = explode(':', $v, 2);
            }
        }
        return $filter;
    }

    public static function getCurrentAgg($type)
    {
        $config = self::getTypeConfig();
        $query_string = $_SERVER['QUERY_STRING'];
        $terms = explode('&', $query_string);
        $agg = [];
        foreach ($terms as $term) {
            list($k, $v) = array_map('urldecode', explode('=', $term));
            if ($k === 'agg') {
                $agg[] = $v;
            }
        }
        if ($agg) {
            return $agg;
        }

        return $config[$type]['default_aggs'] ?? [];
    }

    public static function getRecordList($data, $prefix = '')
    {
        if (is_scalar($data)) {
            return [[
                'key' => rtrim($prefix, '.'),
                'value' => $data,
            ]];
        }

        if (is_array($data)) {
            $ret = [];
            foreach ($data as $idx => $item) {
                $ret = array_merge(
                    $ret,
                    self::getRecordList($item, rtrim($prefix, '.') . "[{$idx}].")
                );
            }
            return $ret;
        }

        $ret = [];
        foreach ($data as $k => $v) {
            $ret = array_merge(
                $ret,
                self::getRecordList($v, "{$prefix}{$k}.")
            );
        }
        return $ret;
    }

    public static function getItemFeatures($type)
    {
        $config = self::getTypeConfig();
        $features = $config[$type]['item_features'] ?? [];
        $features['rawdata'] = '原始資料';
        return $features;
    }

    public static function getCollectionFeatures($type)
    {
        $config = self::getTypeConfig();
        $features = $config[$type]['collection_features'] ?? [];
        $features['table'] = '列表';
        return $features;
    }
}
