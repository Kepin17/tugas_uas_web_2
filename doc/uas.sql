-- Active: 1736158449543@@127.0.0.1@3306@daftar_online_rs
-- Membuat Database
CREATE DATABASE daftar_online_rs;

-- Menggunakan Database
USE daftar_online_rs;

-- Tabel admin
CREATE TABLE admin (
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    nama_admin VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    telepon VARCHAR(15) NOT NULL
);

-- Tabel pasien
CREATE TABLE pasien (
    id_pasien INT AUTO_INCREMENT PRIMARY KEY,
    nama_pasien VARCHAR(100) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    jenis_kelamin ENUM('L', 'P') NOT NULL,
    email VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    telepon VARCHAR(15) NOT NULL
);

-- Tabel dokter
CREATE TABLE dokter (
    id_dokter INT AUTO_INCREMENT PRIMARY KEY,
    nama_dokter VARCHAR(100) NOT NULL,
    spesialisasi VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    telepon VARCHAR(15) NOT NULL,
    status ENUM('Aktif', 'Non-Aktif') NOT NULL
);

-- Tabel jadwal
CREATE TABLE jadwal (
    id_jadwal INT AUTO_INCREMENT PRIMARY KEY,
    id_dokter INT NOT NULL,
    hari_praktek ENUM('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu') NOT NULL,
    jam_mulai TIME NOT NULL,
    jam_selesai TIME NOT NULL,
    FOREIGN KEY (id_dokter) REFERENCES dokter(id_dokter)
);

-- Tabel pendaftaran
CREATE TABLE pendaftaran (
    id_pendaftaran INT AUTO_INCREMENT PRIMARY KEY,
    id_pasien INT NOT NULL,
    id_dokter INT NOT NULL,
    tanggal_daftar DATE NOT NULL,
    keluhan TEXT NOT NULL,
    FOREIGN KEY (id_pasien) REFERENCES pasien(id_pasien),
    FOREIGN KEY (id_dokter) REFERENCES dokter(id_dokter)
);
