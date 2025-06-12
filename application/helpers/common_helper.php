<?php
if(!function_exists('resultArray')) {
    function resultArray($data = []) {
        $table = $data['table'] ?? 'beds';
        $select = $data['select'] ?? '*';
        // $sort = $data['sort'] ?? 'id';
        $sort = $data['sort'] ?? [];
        $sort_type = $data['sort_type'] ?? 'desc';
        $where = $data['where'] ?? [];
        $join = $data['join'] ?? [];

        $CI =& get_instance();
        $CI->load->database();
        
        $CI->db->select($select);
        $CI->db->from($table);
        if (!empty($where)) {
            foreach ($where as $key => $value) {
                $CI->db->where($key, $value);
            }
        }
        if (is_array($sort)) {
            foreach ($sort as $key => $value) {
                $CI->db->order_by($key, $value);
            }
        } else {
            $sort_type = strtoupper($sort_type);
            if (!in_array($sort_type, ['ASC', 'DESC'])) {
                $sort_type = 'DESC';
            }
        }

        //Joins
        if (!empty($join)) {
            foreach ($join as $table => $condition) {
                $CI->db->join($table, $condition);
            }
        }


        // $CI->db->order_by($sort, $sort_type);
        // $CI->db->order_by('id', 'desc');
        
        return $CI->db->get()->result_array();
    }
}


?>