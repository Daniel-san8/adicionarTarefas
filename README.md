-- Criação do banco de dados
CREATE DATABASE projeto_tarefas;
USE projeto_tarefas;

-- Tabela de categorias
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL UNIQUE
);

-- Tabela de responsáveis
CREATE TABLE responsaveis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE
);

-- Tabela de tarefas
CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    categoria_id INT,
    responsavel_id INT,
    data_inicio DATETIME DEFAULT NULL,
    data_pausa DATETIME DEFAULT NULL,
    data_finalizacao DATETIME DEFAULT NULL,
    valor_cobrado DECIMAL(10, 2) DEFAULT NULL,
    status ENUM('pendente', 'em andamento', 'finalizada') DEFAULT 'pendente',
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE CASCADE,
    FOREIGN KEY (responsavel_id) REFERENCES responsaveis(id) ON DELETE CASCADE
);


-- Inserção de categorias
INSERT INTO categorias (nome) VALUES 
('Desenvolvimento'),
('Design'),
('Marketing');

-- Inserção de responsáveis
INSERT INTO responsaveis (nome, email) VALUES 
('Alice Silva', 'alice@example.com'),
('Bob Santos', 'bob@example.com'),
('Carlos Oliveira', 'carlos@example.com');

-- Inserção de tarefas (exemplo)
INSERT INTO tarefas (titulo, descricao, categoria_id, responsavel_id) VALUES 
('Implementar Login', 'Criar a funcionalidade de login de usuários', 1, 1),
('Criar Logo', 'Desenvolver o logotipo do projeto', 2, 2),
('Campanha de Mídia Social', 'Criar campanhas para redes sociais', 3, 3);

Abra seu cliente de banco de dados (como phpMyAdmin ou MySQL Workbench).
Crie um novo banco de dados com o nome projeto_tarefas.
Execute o script de criação para criar as tabelas.
Execute o script de inserção para adicionar dados iniciais.
