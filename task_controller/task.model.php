<?php

    class Task {
        private $id;
        private $id_status;
        private $task;
        private $date_submit;

        public function __get($attr) {
            return $this->$attr;
        }

        public function __set($attr, $value) {
            $this->$attr = $value;
        }
    }