<?php
/**
 * Class Helpers
 * Advanced helpers class
 *
 */
class Helpers
{
    /**
     * @param array $options - option lists
     * @param string $field - table field
     * @param int $selected - default selected option list
     * @param string $first_options - first option title
     * @param array $attrs - html attributes
     * @return mixed - html select tag with options
     */
    public static function select($options = [], $field = 'title', $selected = 1, $first_options = '', $attrs = [])
    {
        return view('_helpers.select')
            ->with('options', $options)
            ->with('field', $field)
            ->with('selected', $selected)
            ->with('first_options', $first_options)
            ->with('attrs', $attrs);
    }
    public static function script($path = '')
    {
        return "<script src='/js/$path'></script>";
    }
}