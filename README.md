### Custom Out of Stock Sorting for Magento 2

It'll display out of stock products at the end of the catalog. Also, you can sort by `ASC` and `DESC`

> **User this module in Magento 2.4 or later**
## Installation

If you want to install this extension using composer then make sure your composer version is **Composer 2.0**

```base
composer require mayankdolphin/magento2-module-customsorting
```

```base
bin/magento module:enable Dolphin_CustomSorting
```

## Configuration

Go to `admin > store > configuration > Dolphin > Custom Sorting` and change the settings as per below screenshot.

![customsorting_admin_configuration](https://user-images.githubusercontent.com/59246854/168252638-ade40c4f-dd2a-42eb-8398-1cd3304c1c62.png)

Go to terminal and run below command.

```base
bin/magento c:c
```
```base
bin/magento indexer:reindex
```
You'll see output like this.

![customsorting_front](https://user-images.githubusercontent.com/59246854/168252860-22a41daf-62fc-46bb-ac63-3f5bc2386f8d.png)

### Module created by [Dolphin Web Solution](https://dolphinwebsolution.com/) Developers. Explore more [Magento 2 Extensions](https://dolphinwebsolution.com/shop/magento-2-extensions.html)
