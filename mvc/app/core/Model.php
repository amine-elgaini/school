<?php
Trait Model {
	use Database;

  function selectInfo($field, $table, array $conditions=[], array $notConditions=[], $action='fetchAll', $order='') {
    $where = $this->whereHandling($conditions, $notConditions);
    $stm = "SELECT $field FROM $table $where $order";
    $values = array_merge(array_values($conditions), array_values($notConditions));
    $res = $this->query_info($stm, $values, $action);

    // Retrun Result
    return $res;
    
  }

  //still not working
  function updateInfo($table, $updates, $conditions=[], $notConditions=[]) {
    $set = array_map(fn ($val) => $val . ' = ?', array_keys($updates));
    $set = join(', ', $set);

    $where = $this->whereHandling($conditions, $notConditions);
    $stm = "UPDATE $table SET $set $where";
    $values = array_merge(array_values($updates), array_values($conditions), array_values($notConditions));
    $res = $this->query_execute($stm, $values);
    return $res;
  }

  function insertInfo($table, array $values) {
    // handle conditions
    $keys = join(', ', array_keys($values));
    $prep = array_map(fn ($prep) => '?', $values);
    $prep = join(', ', $prep);
    $stm = "INSERT INTO $table($keys) VALUES($prep)";
    $res = $this->query_execute($stm, $values);
    return $res;
  }

  function deleteInfo($table, array $conditions=[], $notConditions=[]) {
    
    $where = $this->whereHandling($conditions, $notConditions);
    $stm = "DELETE FROM $table $where";
    $values = array_merge(array_values($conditions), array_values($notConditions));
    $res = $this->query_execute($stm, $values);
    return $res;
  }

  function whereHandling($conditions, $notConditions) {
    // handle conditions
    $where = null;
    if (!empty($conditions)) {
      $where = array_map(fn ($val) => $val . ' = ?', array_keys($conditions));
      $where = ' WHERE ' . join(' AND ', $where);
    }

    $notWhere = null;
    if (!empty($notConditions)) {
      $notWhere = array_map(fn ($val) => $val . ' != ?', array_keys($notConditions));
      $whereExistense = !is_string($where) ? ' WHERE ' : ' AND ';
      $notWhere = $whereExistense . join(' AND ', $notWhere);
    }
    
    return $where . $notWhere;
  }

  function joinTables($field, $join, array $conditions=[], array $notConditions=[], $action='fetchAll', $order='', $limit='') {
    $where = $this->whereHandling($conditions, $notConditions);
    $stm = "SELECT $field $join $where $order $limit";

    $values = array_merge(array_values($conditions), array_values($notConditions));
    $res = $this->query_info($stm, $values, $action);
    // Retrun Result
    return $res;
  }

}