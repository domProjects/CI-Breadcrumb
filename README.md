# CI-Breadcrumb
Breadcrumb library for CodeIgniter 3.x.x

## Demo
You can see the demo that online at this address: https://demo.domprojects.com/ci-breadcrumb/

![Breadcrumb](https://demo.domprojects.com/ci-breadcrumb/screenshot/screenshot.png)

## Installation
### CodeIgniter
1. Download [CodeIgniter 3.x.x](https://codeigniter.com/download)
1. Unpack the archive
1. Copy the contents of the uncompressed archive to the root of your site or copy the directory of the uncompressed archive to the root of your site

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
1. Download the archive
1. Unpack the archive
1. Copy the contents of the uncompressed archive to your site

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
Your controller file contents with the default style:
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
With a style customization (for the example with Bootstrap):
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
File contents `test_breadcrumb.php` :
```php
<?php echo $content_breadcrumb; ?>
```

## Result
### Default style (without style)
```
1. Dashbord
2. Users
3. Add
```

### Bootstrap style
```
Dashbord / Users / Add
```
