# 📦 Esercizio Laravel: API Products

## 🎯 Obiettivo
Realizzare una semplice API REST in Laravel per gestire un catalogo prodotti.

---

## 🧠 Requisiti

Dovrai creare:

- Migration
- Model
- Controller API
- Rotte API
- Test tramite Postman / curl

---

## 🗄️ Struttura Database

Crea una tabella `products` con i seguenti campi:

- id (auto increment)
- name (string)
- description (text)
- price (decimal 8,2)
- created_at
- updated_at

---

## ⚙️ Step 1: Creazione Model + Migration

```bash
php artisan make:model Product -m