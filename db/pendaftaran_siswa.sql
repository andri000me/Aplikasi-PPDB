-- -----------------------------------------------------
-- Table users
-- -----------------------------------------------------
CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  nama VARCHAR(45) NULL,
  username VARCHAR(100) NULL,
  password VARCHAR(255) NULL,
  level VARCHAR(45) NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX username_UNIQUE (username ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table pendaftar
-- -----------------------------------------------------
CREATE TABLE pendaftar (
  id INT NOT NULL AUTO_INCREMENT,
  nama VARCHAR(100) NULL,
  tmpt_lahir VARCHAR(100) NULL,
  tgl_lahir DATE NULL,
  jenis_kelamin ENUM('L', 'P') NULL,
  agama VARCHAR(45) NULL,
  alamat TEXT NULL,
  email VARCHAR(100) NULL,
  telepon VARCHAR(45) NULL,
  users_id INT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX email_UNIQUE (email ASC),
  INDEX fk_pendaftar_users_idx (users_id ASC),
  CONSTRAINT fk_pendaftar_users
    FOREIGN KEY (users_id)
    REFERENCES users (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table nilai
-- -----------------------------------------------------
CREATE TABLE nilai (
  id INT NOT NULL AUTO_INCREMENT,
  nilai_un DOUBLE NULL,
  nilai_us DOUBLE NULL,
  pendaftar_id INT NULL,
  PRIMARY KEY (id),
  INDEX fk_nilai_pendaftar1_idx (pendaftar_id ASC),
  CONSTRAINT fk_nilai_pendaftar1
    FOREIGN KEY (pendaftar_id)
    REFERENCES pendaftar (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
