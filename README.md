# CI-Breadcrumb
Breadcrumb library for CodeIgniter 3.x.x

## Installation
### CodeIgniter
1. Téléchargez [CodeIgniter 3.x.x](https://codeigniter.com/download)
1. Décompressez l'archive
1. Copiez le contenu de l'archive décompressée à la racine de votre site ou copiez le répertoire de l'archive décompressée à la racine de votre site

```
./
|_ application
|_ system
|_ index.php
```
OR
```
./
|_ CI-Breadcrumb
  |_ application
  |_ system
  |_ index.php
```
### Librairie CI-Breadcrumb
1. Téléchargez l'archive
1. Décompressez l'archive
1. Copiez le contenu de l'archive décompressée dans votre site

```
./
|_ application
  |_ controllers
    |_ Test_breadcrumb.php
  |_ libraries
    |_ Breadcrumb.php
  |_ views
    |_ test_breadcrumb.php
|_ system
|_ index.php
```
OR
```
./
|_ CI-Breadcrumb
  |_ application
    |_ controllers
      |_ Test_breadcrumb.php
    |_ libraries
      |_ Breadcrumb.php
    |_ views
      |_ test_breadcrumb.php
  |_ system
  |_ index.php
```

## Utilisation
### Folder controllers
Contenu du fichier de votre controlleur avec le style par défaut:
```php
// Load library breadcrumb
$this->load->library('breadcrumb');

// Add items
$breadcrumb_items = [
  'Dashboard' => '/',
  'Users' => 'users',
  'Add' => 'users/add'
];
$this->breadcrumb->add_item($breadcrumb_items);

// Generate breadcrumb
$this->data['content_breadcrumb'] = $this->breadcrumb->generate();
```
Avec une customisation du style (pour l'exemple avec Bootstrap)
```
// Load library breadcrumb
$this->load->library('breadcrumb');

// Custom style
$template = [
  'tag_open' => '<ol class="breadcrumb">',
  'crumb_open' => '<li class="breadcrumb-item">',
  'crumb_active' => '<li class="breadcrumb-item active" aria-current="page">'
];
$this->breadcrumb->set_template($template);

// Add items
$this->breadcrumb->add_item($breadcrumb_items);

// Generate breadcrumb
$data['breadcrumb_bootstrap_style'] = $this->breadcrumb->generate();
```

### Folder views
Contenu du fichier `test_breadcrumb.php` :
```php
<?php echo $content_breadcrumb; ?>
```

## Result
### Default style (sans mise en page)
```
1. Dashbord
2. Users
3. Add
```

### Bootstrap style
```
Dashbord / Users / Add
```
