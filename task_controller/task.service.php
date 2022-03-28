<?php

    //CRUD
    class TaskService {
        private $connection;
        private $task;

        public function __construct(Connection $connection, Task $task) {
            $this->connection = $connection->connect();
            $this->task = $task;
        }

        public function taskCreate() {
            $query = "insert into tb_tasks(task, id_user) values (:task, :id_user)";
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':task', $this->task->__get('task'));
            $stmt->bindValue(':id_user', $this->task->__get('id_user'));
            $stmt->execute();
        }
        public function taskRead() {
            if($this->task->id_user != 1) {
                $query = "
                    select t.id, s.status, t.task
                    from tb_tasks as t
                    left join tb_status as s
                    on t.id_status = s.id
                    where t.id_user = :id_user
                ";
            } else {
                $query = "
                    SELECT
                    u.username,
                    t.id,
                    t.task,
                    t.id_user,
                    s.status
                    FROM tb_users as u
                    RIGHT JOIN tb_tasks as t
                    ON u.id_user = t.id_user
                    LEFT JOIN tb_status as s
                    ON t.id_status = s.id
                ";
            };
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':id_user', $this->task->__get('id_user'));
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function taskUpdate($stat, $page) {
            if($stat == false) {
                $query = 'update tb_tasks set task := :task where id = :id';
                $stmt = $this->connection->prepare($query);
                $stmt->bindValue(':id', $this->task->__get('id'));
                $stmt->bindValue(':task', $this->task->__get('task'));
            } else {
                $status = $this->task->__get('status');
                if($status == 'Pending') $status = 2;
                else $status = 1;
                
                $query = "
                    update tb_tasks
                    set id_status := :status
                    where id = :id
                ";
                $stmt = $this->connection->prepare($query);
                $stmt->bindValue(':id', $this->task->__get('id'));
                $stmt->bindValue(':status', $status);
            }

            $stmt->execute();

            header('location: '.$page);
        }
        public function taskDelete($page) {
            $query = 'delete from tb_tasks where id = :id';
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':id', $this->task->__get('id'));
            $stmt->execute();

            header('location: '.$page);
        }
    }