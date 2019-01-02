<?php

namespace App\Supports\Helpers;

use phpDocumentor\Reflection\Types\Self_;

class Arr {
    public static function filterMDArr($arrayData) {
        $array = array_map('array_filter', $arrayData);
        return array_filter($array);
    }

    public static function objToArray($obj) {

        $newarr = [];
        $classlen = 0;
        if (is_object($obj)) {
            $classlen = strlen(get_class($obj));
            $obj = (array)$obj;
        }
        if (is_array($obj)) {
            foreach ($obj as $key => $val) {
                if (!is_array($val) and !is_object($val)) {
                    $newarr[Str::lower(substr(trim($key), $classlen))] = $val;
                } else {
                    $newarr[] = self::objToArray($val);
                }
            }
        }
        return $newarr;
    }

    public static function createCustomArr($data, $columns) {

        $newarr = [];
        $newdata = [];
        $serialno = 0;
        if (is_object($data)) {
            $newdata[] = self::objToArray($data);
        } else {
            if (is_array($data)) {
                $newdata = $data;
            }
        }
        foreach ($newdata as $o => $row) {
            if (is_object($row)) {
                $row = self::objToArray($row);
            }
            $row = array_replace_recursive($columns, $row);
            // self::echoPre($row);
            foreach ($row as $k => $v) {
                if (isset($columns[$k]) and !is_array($v)) {
                    if ($k == 'serialno') {
                        $serialno++;
                        $newarr[$o][$columns[$k]] = $serialno;
                    } elseif (strpos($k, 'status') !== false) {
                        $newarr[$o][$columns[$k]] = flagText($v);
                    } else {
                        $newarr[$o][$columns[$k]] = multiStrReplace([
                            '-', '_',
                        ], ' ', initCap($v));
                    }
                }
            }
        }
        return $newarr;
    }

    public static function arrGroupBy(array $arr, $key) {
        if (!is_string($key) && !is_int($key) && !is_float($key) && !is_callable($key)) {
            trigger_error('array_group_by(): The key should be a string, an integer, a float, or a function', E_USER_ERROR);
        }
        $isFunction = !is_string($key) && is_callable($key);
        // Load the new array, splitting by the target key
        $grouped = [];
        foreach ($arr as $value) {
            $groupKey = null;
            if ($isFunction) {
                $groupKey = $key($value);
            } else {
                if (is_object($value)) {
                    $groupKey = $value->{$key};
                } else {
                    $groupKey = $value[$key];
                }
            }
            $grouped[$groupKey][] = $value;
        }
        // Recursively build a nested grouping if more parameters are supplied
        // Each grouped array value is grouped according to the next sequential key
        if (func_num_args() > 2) {
            $args = func_get_args();
            foreach ($grouped as $groupKey => $value) {
                $params = array_merge([$value], array_slice($args, 2, func_num_args()));
                $grouped[$groupKey] = call_user_func_array('array_group_by', $params);
            }
        }
        return $grouped;
    }

    public static function arrRandomValue(array $array, $numReq = 1) {
        if (!count($array)) {
            return null;
        }
        $keys = array_rand($array, $numReq);
        if ($numReq === 1) {
            return $array[$keys];
        }
        return array_intersect_key($array, array_flip($keys));
    }

    /**
     * Remove the duplicates from an array.
     * @param array $array
     * @param bool $keepKeys
     * @return array
     */
    public static function uniqueArray($array, $keepKeys = false) {

        if ($keepKeys) {
            $array = array_unique($array);
        } else {
            // This is faster version than the builtin array_unique().
            // http://stackoverflow.com/questions/8321620/array-unique-vs-array-flip
            // http://php.net/manual/en/function.array-unique.php
            $array = array_keys(array_flip($array));
        }
        return $array;
    }

    /**
     * Check is key exists
     * @param string $key
     * @param mixed $array
     * @param bool $returnValue
     * @return mixed
     */
    public static function key($key, $array, $returnValue = false) {

        $isExists = array_key_exists((string)$key, (array)$array);
        if ($returnValue) {
            if ($isExists) {
                return $array[$key];
            }
            return null;
        }
        return $isExists;
    }

    /**
     * Check is value exists in the array
     * @param string $value
     * @param mixed $array
     * @param bool $returnKey
     * @return mixed
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public static function in($value, array $array, $returnKey = false) {

        $inArray = in_array($value, $array, true);
        if ($returnKey) {
            if ($inArray) {
                return array_search($value, $array, true);
            }
            return null;
        }
        return $inArray;
    }

    /**
     * Returns the first element in an array.
     * @param  array $array
     * @return mixed
     */
    public static function firstValue(array $array) {

        return reset($array);
    }

    /**
     * Returns the last element in an array.
     * @param  array $array
     * @return mixed
     */
    public static function lastValue(array $array) {

        return end($array);
    }

    /**
     * Returns the first key in an array.
     * @param  array $array
     * @return int|string
     */
    public static function firstKey(array $array) {

        reset($array);
        return key($array);
    }

    /**
     * Returns the last key in an array.
     * @param  array $array
     * @return int|string
     */
    public static function lastKey(array $array) {

        end($array);
        return key($array);
    }

    /**
     * Clean array by custom rule
     * @param array $haystack
     * @return array
     */
    public static function arrayFilter($haystack) {
        return array_filter($haystack);
    }

    /**
     * Clean array before serialize to JSON
     * @param array $array
     * @return array
     */
    public static function cleanBeforeJson(array $array) {

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = self::cleanBeforeJson($array[$key]);
            }
            if ($array[$key] === '' || is_null($array[$key])) {
                unset($array[$key]);
            }
        }
        return $array;
    }

    /**
     * Check is array is type assoc
     * @param $array
     * @return bool
     */
    public static function isAssocArray($array) {

        return array_keys($array) !== range(0, count($array) - 1);
    }

    /**
     * Returns boolean if a function is flat/sequential numeric array
     *
     * @param  array $array An array to test
     *
     * @return boolean
     */
    public static function isNumericArray($array) {
        if (!is_array($array)) {
            return false;
        }
        $current = 0;
        foreach (array_keys($array) as $key) {
            if ($key !== $current) {
                return false;
            }
            $current++;
        }
        return true;
    }

    /**
     * Add cell to the start of assoc array
     * @param array $array
     * @param string $key
     * @param mixed $value
     * @return array
     */
    public static function unshiftAssoc(array &$array, $key, $value) {

        $array = array_reverse($array, true);
        $array[$key] = $value;
        $array = array_reverse($array, true);
        return $array;
    }

    /**
     * Group array by key
     * @param array $arrayList
     * @param string $key
     * @return array
     */
    public static function groupByKey(array $arrayList, $key = 'id') {

        $result = [];
        foreach ($arrayList as $item) {
            if (is_object($item)) {
                if (isset($item->{$key})) {
                    $result[$item->{$key}][] = $item;
                }
            } else {
                if (is_array($item)) {
                    if (self::key($key, $item)) {
                        $result[$item[$key]][] = $item;
                    }
                }
            }
        }
        return $result;
    }

    /**
     * Sort an array by keys based on another array
     * @param array $array
     * @param array $orderArray
     * @return array
     */
    public static function sortByArray(array $array, array $orderArray) {

        return array_merge(array_flip($orderArray), $array);
    }

    /**
     * Add some prefix to each key
     * @param array $array
     * @param string $prefix
     * @return array
     */
    public static function addEachKey(array $array, $prefix) {

        $result = [];
        foreach ($array as $key => $item) {
            $result[$prefix . $key] = $item;
        }
        return $result;
    }

    /**
     * Convert assoc array to comment style
     * @param array $data
     * @return string
     */
    public static function toComment(array $data) {

        $result = [];
        foreach ($data as $key => $value) {
            $result[] = $key . ': ' . $value . ';';
        }
        return implode(PHP_EOL, $result);
    }

    /**
     * Get a random value from an array, with the ability to skew the results.
     * Example: array_rand_weighted(['foo' => 1, 'bar' => 2]) has a 66% chance of returning bar.
     *
     * @param array $array
     *
     * @return mixed
     */
    public static function arrRandWeighted(array $array) {
        $options = [];
        foreach ($array as $option => $weight) {
            for ($i = 0; $i < $weight; ++$i) {
                $options[] = $option;
            }
        }
        return self::arrRandomValue($options);
    }

    /**
     * Determine if all given needles are present in the haystack.
     *
     * @param array|string $needles
     * @param array $haystack
     *
     * @return bool
     */
    public static function valuePresent($needles, array $haystack) {
        if (!is_array($needles)) {
            $needles = [$needles];
        }
        return count(array_intersect($needles, $haystack)) === count($needles);
    }

    /**
     * Determine if all given needles are present in the haystack as array keys.
     *
     * @param array|string $needles
     * @param array $haystack
     *
     * @return bool
     */
    public static function keyPresent($needles, array $haystack) {
        if (!is_array($needles)) {
            return array_key_exists($needles, $haystack);
        }
        return self::valuePresent($needles, array_keys($haystack));
    }

    /**
     * Flatten a multi-dimensional array into a one dimensional array.
     * @param  array $array The array to flatten
     * @param  boolean $preserve_keys Whether or not to preserve array keys. Keys from deeply nested arrays will
     *                                overwrite keys from shallowy nested arrays
     * @return array
     */
    public static function flat(array $array, $preserve_keys = true) {

        $flattened = [];
        array_walk_recursive($array, function ($value, $key) use (&$flattened, $preserve_keys) {

            if ($preserve_keys && !is_int($key)) {
                $flattened[$key] = $value;
            } else {
                $flattened[] = $value;
            }
        });
        return $flattened;
    }

    /**
     * Split an array in the given amount of pieces.
     *
     * @param array $array
     * @param int $numberOfPieces
     * @param bool $preserveKeys
     *
     * @return array
     */
    public static function arrSplit(array $array, $numberOfPieces = 2, $preserveKeys = false) {
        if (count($array) === 0) {
            return [];
        }
        $splitSize = ceil(count($array) / $numberOfPieces);
        return array_chunk($array, $splitSize, $preserveKeys);
    }

    /**
     * Searches for a given value in an array of arrays, objects and scalar values. You can optionally specify
     * a field of the nested arrays and objects to search in.
     * @param  array $array The array to search
     * @param  mixed $search The value to search for
     * @param  bool $field The field to search in, if not specified all fields will be searched
     * @return boolean|mixed  False on failure or the array key on success
     */
    public static function search(array $array, $search, $field = false) {

        // *grumbles* stupid PHP type system
        $search = (string)$search;
        foreach ($array as $key => $elem) {
            // *grumbles* stupid PHP type system
            $key = (string)$key;
            if ($field) {
                if (is_object($elem) && $elem->{$field} === $search) {
                    return $key;
                } else {
                    if (is_array($elem) && $elem[$field] === $search) {
                        return $key;
                    } else {
                        if (is_scalar($elem) && $elem === $search) {
                            return $key;
                        }
                    }
                }
            } else {
                if (is_object($elem)) {
                    $elem = (array)$elem;
                    if (in_array($search, $elem)) {
                        return $key;
                    }
                } else {
                    if (is_array($elem) && in_array($search, $elem)) {
                        return $key;
                    } else {
                        if (is_scalar($elem) && $elem === $search) {
                            return $key;
                        }
                    }
                }
            }
        }
        return false;
    }

    /**
     * Returns an array containing all the elements of arr1 after applying
     * the callback function to each one.
     * @param  string $callback Callback function to run for each element in each array
     * @param  array $array An array to run through the callback function
     * @param  boolean $onNoScalar Whether or not to call the callback function on nonscalar values
     *                             (Objects, resources, etc)
     * @return array
     */
    public static function mapDeep(array $array, $callback, $onNoScalar = false) {

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $args = [
                    $value, $callback, $onNoScalar,
                ];
                $array[$key] = call_user_func_array([
                    __CLASS__, __FUNCTION__,
                ], $args);
            } else {
                if (is_scalar($value) || $onNoScalar) {
                    $array[$key] = call_user_func($callback, $value);
                }
            }
        }
        return $array;
    }

    /**
     * Get one field from array of arrays (array of objects)
     * @param array $arrayList
     * @param string $fieldName
     * @return array
     */
    public static function getField($arrayList, $fieldName = 'id') {

        $result = [];
        if (!empty($arrayList) && is_array($arrayList)) {
            foreach ($arrayList as $option) {
                if (is_array($option)) {
                    $result[] = $option[$fieldName];
                } else {
                    if (is_object($option)) {
                        if (isset($option->{$fieldName})) {
                            $result[] = $option->{$fieldName};
                        }
                    }
                }
            }
        }
        return $result;
    }

    /**
     * Recursive array mapping
     * @param \Closure $function
     * @param array $array
     * @return array
     */
    public static function map($function, $array) {

        $result = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result[$key] = self::map($function, $value);
            } else {
                $result[$key] = call_user_func($function, $value);
            }
        }
        return $result;
    }

    /**
     * Wraps its argument in an array unless it is already an array
     * @example
     *   Arr.wrap(null)      # => []
     *   Arr.wrap([1, 2, 3]) # => [1, 2, 3]
     *   Arr.wrap(0)         # => [0]
     * @param mixed $object
     * @return array
     */
    public static function wrap($object) {

        if (is_null($object)) {
            return [];
        } else {
            if (is_array($object) && !self::isAssocArray($object)) {
                return $object;
            }
        }
        return [$object];
    }

    /**
     * @param string $glue
     * @param array $array
     * @return string
     */
    public static function implode($glue, array $array) {

        $result = '';
        foreach ($array as $item) {
            if (is_array($item)) {
                $result .= self::implode($glue, $item) . $glue;
            } else {
                $result .= $item . $glue;
            }
        }
        if ($glue) {
            $result = Str::sub($result, 0, 0 - Str::strlen($glue));
        }
        return $result;
    }

    /**
     * Accepts an array, and returns an array of values from that array as
     * specified by $field. For example, if the array is full of objects
     * and you call util::array_pluck($array, 'name'), the function will
     * return an array of values from $array[]->name.
     *
     * @param  array $array An array
     * @param  string $field The field to get values from
     * @param  boolean $preserve_keys Whether or not to preserve the
     *                                   array keys
     * @param  boolean $remove_nomatches If the field doesn't appear to be set,
     *                                   remove it from the array
     * @return array
     */
    public static function arrayPluck(array $array, $field, $preserve_keys = true, $remove_nomatches = true) {
        $new_list = [];
        foreach ($array as $key => $value) {
            if (is_object($value)) {
                if (isset($value->{$field})) {
                    if ($preserve_keys) {
                        $new_list[$key] = $value->{$field};
                    } else {
                        $new_list[] = $value->{$field};
                    }
                } elseif (!$remove_nomatches) {
                    $new_list[$key] = $value;
                }
            } else {
                if (isset($value[$field])) {
                    if ($preserve_keys) {
                        $new_list[$key] = $value[$field];
                    } else {
                        $new_list[] = $value[$field];
                    }
                } elseif (!$remove_nomatches) {
                    $new_list[$key] = $value;
                }
            }
        }
        return $new_list;
    }

    /**
     * Returns an array with the unique values from all the given arrays.
     *
     * @param \array[] $arrays
     *
     * @return array
     */
    public static function arrMergeValues(array ...$arrays) {
        $allValues = array_reduce($arrays, function ($carry, $array) {
            return array_merge($carry, $array);
        }, []);
        return array_values(array_unique($allValues));
    }

}
