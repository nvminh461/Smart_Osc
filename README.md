# Smart_Osc Extenstion in magento 2
# Contents.
- [Installing the Nvm_Banner Module in Magento 2](#installing-the-nvm_banner-module-in-magento-2)
- [Installing the Nvm_Wholesale Module in Magento 2](#installing-the-nvm_wholesale-module-in-magento-2)
- [Installing the Nvm_Donation Module in Magento 2](#installing-the-nvm_donation-module-in-magento-2)
## Installing the Nvm_Banner Module in Magento 2
In this guide, we will learn how to install the Nvm_Banner Module in Magento 2 using Git.
#### Step 1: Navigate to the `app/code` Directory in Magento 2
First, open a terminal or command line and navigate to the `app/code` directory of your Magento 2 installation:
```bash
cd app/code/
```
#### Step 2: Clone the Nvm_Banner Module from GitHub
Use the following command to clone the Nvm_Banner module from GitHub with the module/banner branch:
```bash
git clone -b module/banner https://github.com/nvminh461/Smart_Osc.git
```
This command will download the Nvm_Banner module from the specified branch on GitHub and store it in your Magento 2 installation.
#### Step 3: Enable module, Update the Database and Schema
To make sure the Nvm_Banner module is properly installed, run the following command to update the database and schemas of Magento 2:
```bash
php bin/magento mo:en Nvm_Banner
php bin/magento setup:upgrade
```
This command will apply any necessary database and schema updates to integrate the Nvm_Banner module with your Magento 2 store.
#### Step 4: Clear the Cache
After upgrading, it's essential to clear the cache to reflect the changes. Use the following command to clear the cache of Magento 2:
```bash
php bin/magento cache:flush
```
Clearing the cache ensures that your Magento 2 store is up to date with the changes you've made.
#### Step 5: Deploy Static Content
To complete the installation, deploy static content of Magento 2 using the following command (use -f to force if needed):
```bash
php bin/magento setup:static-content:deploy -f
```
This command will generate static files necessary for the Nvm_Banner module and your Magento 2 store to work correctly.
That's it! You have successfully installed the Nvm_Banner Module in Magento 2. Your store is now ready to utilize the features of this extension.

## Installing the Nvm_Wholesale Module in Magento 2
In this guide, we will learn how to install the Nvm_Wholesale Module in Magento 2 using Git.
#### Step 1: Navigate to the `app/code` Directory in Magento 2
First, open a terminal or command line and navigate to the `app/code` directory of your Magento 2 installation:
```bash
cd app/code/
```
#### Step 2: Clone the Nvm_Banner Module from GitHub
Use the following command to clone the Nvm_Wholesale module from GitHub with the module/wholesale branch:
```bash
git clone -b module/wholesale https://github.com/nvminh461/Smart_Osc.git
```
This command will download the Nvm_Wholesale module from the specified branch on GitHub and store it in your Magento 2 installation.
#### Step 3: Enable module, Update the Database and Schema
To make sure the Nvm_Wholesale module is properly installed, run the following command to update the database and schemas of Magento 2:
```bash
php bin/magento mo:en Nvm_Wholesale Mageplaza_Core Mageplaza_Smtp
php bin/magento setup:upgrade
```
This command will apply any necessary database and schema updates to integrate the Nvm_Banner module with your Magento 2 store.
#### Step 4: Configure Email for Sending Information to Customers
You can use mailtrap.io to create a test email account and then connect it to the Magento admin.
![MailtrapSmtp.png](Images%2FMailtrapSmtp.png)
#### Step 5: Clear the Cache
After upgrading, it's essential to clear the cache to reflect the changes. Use the following command to clear the cache of Magento 2:
```bash
php bin/magento cache:flush
```
Clearing the cache ensures that your Magento 2 store is up to date with the changes you've made.
#### Step 6: Deploy Static Content
To complete the installation, deploy static content of Magento 2 using the following command (use -f to force if needed):
```bash
php bin/magento setup:static-content:deploy -f
```
This command will generate static files necessary for the Nvm_Wholesale module and your Magento 2 store to work correctly.
That's it! You have successfully installed the Nvm_Wholesale Module in Magento 2. Your store is now ready to utilize the features of this extension.

## Installing the Nvm_Donation Module in Magento 2
