CREATE DATABASE IF NOT EXISTS sekolah;
USE sekolah;

-- Hapus tabel lama jika ada
DROP TABLE IF EXISTS siswa;

-- Buat tabel siswa
CREATE TABLE siswa (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nis VARCHAR(20) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    sekolah VARCHAR(100) NOT NULL,
    jurusan VARCHAR(100) NOT NULL,
    kelas VARCHAR(20) NOT NULL,
    alamat TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);