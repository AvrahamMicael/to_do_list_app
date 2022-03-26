CREATE TABLE tb_status(
	id int(1) not null PRIMARY KEY AUTO_INCREMENT,
    status varchar(10) not null
);

INSERT INTO tb_status(status) VALUES('Pending'), ('Finished');

CREATE TABLE tb_tasks(
	task text not null,
    id int not null PRIMARY KEY AUTO_INCREMENT,
    id_status int(1) not null default 1,
    FOREIGN KEY(id_status) REFERENCES tb_status(id),
    date_submit datetime not null DEFAULT CURRENT_TIMESTAMP
);