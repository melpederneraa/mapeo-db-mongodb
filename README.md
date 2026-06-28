# Trabajo Práctico – Mapeo Objeto Documento con MongoDB

## Cátedra

**Materia:** Base de Datos  
**Universidad:** Universidad Tecnológica Nacional – Facultad Regional Villa Maria

**Trabajo Práctico:** Mapeo Objeto Documento (Doctrine ODM + MongoDB)
---

# Descripción

Este trabajo práctico consiste en la implementación de una aplicación desarrollada con **Symfony**, utilizando **Doctrine MongoDB ODM** como herramienta de mapeo objeto-documento y **MongoDB** como sistema gestor de base de datos NoSQL.

El proyecto implementa las operaciones básicas del CRUD (Crear, Leer, Actualizar y Eliminar) sobre las siguientes colecciones:

- Categoría
- Producto
- Cliente
- Pedido

Además, se demuestra el uso de relaciones entre documentos mediante referencias administradas por Doctrine ODM.

---

# Tecnologías utilizadas

- PHP 8.2
- Symfony 7
- Doctrine MongoDB ODM
- MongoDB 8
- Docker
- Docker Compose

---

# Requisitos

Es necesario tener instalado:

- Docker Desktop
- Git

---

# Instalación

## 1. Clonar el repositorio

```bash
git clone https://github.com/USUARIO/NOMBRE-REPOSITORIO.git
```

## 2. Ingresar al proyecto

```bash
cd NOMBRE-REPOSITORIO
```

## 3. Levantar los contenedores

```bash
docker compose up -d --build
```

## 4. Ingresar al contenedor de PHP

```bash
docker compose exec php bash
```

## 5. Instalar las dependencias

```bash
composer install
```

## 6. Crear las colecciones de MongoDB

```bash
php bin/console doctrine:mongodb:schema:create
```

## 7. Iniciar el servidor de Symfony

Desde otra terminal ejecutar:

```bash
docker compose exec php php -S 0.0.0.0:8000 -t public
```

La aplicación estará disponible en:

```
http://localhost:8000
```

---

# Funcionalidades

Las rutas implementadas permiten realizar las operaciones CRUD sobre los documentos almacenados en MongoDB.

Ejemplos:

```
/crear
/listar
/actualizar/{nombre}
/eliminar/{nombre}
/buscar/{nombre}
```

---

# Estructura del proyecto

```
app/
│
├── config/
├── public/
├── src/
│   ├── Controller/
│   └── Document/
├── templates/
└── vendor/
```

---

# Bibliografía

- Documentación oficial de Symfony
- Documentación oficial de Doctrine MongoDB ODM
- Documentación oficial de MongoDB
- Documentación oficial de Docker
- Silberschatz, A., Korth, H. F. y Sudarshan, S. *Fundamentos de Bases de Datos*.

---

# Repositorio

Repositorio desarrollado para la materia **Base de Datos** de la **Universidad Tecnológica Nacional – Facultad Regional Buenos Aires (UTN FRBA)** como parte del Trabajo Práctico de **Mapeo Objeto Documento con MongoDB**.
