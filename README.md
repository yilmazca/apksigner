# WARNING

This software should be used for **educational** or **security purposes** only. The author is not responsible for any misuse of the code presented here.

## About

This software re-signs APK files. How you use it is entirely up to you.

The software uses **PHP** and some **console tools** to sign `.apk` files in a RANDOM manner. It has been partially developed and works with console tools.

If you're not an **expert** or unsure of what this does, avoid using it. It may corrupt or modify your APK files. The author takes **no responsibility** for such issues.

**This software does not work on standard hosting accounts.**  
It is not compatible with web hosting management software like cPanel, DirectAdmin, Plesk, and CWP, and requires additional dependencies.

Some parts of the portal are still under development, and I currently don't have time to finish them.

## Requirements to Run APK Signer

- **PHP 8.1 or higher**
- **MySQL Database**
- All server-side extensions and requirements for **CodeIgniter 4.5 core version**

Additionally, the `exec` function must be **enabled** in the `php.ini` file.

### System Requirements

- **Keytool**
- **Jarsigner**

These tools must be installed on the Linux side.

## APK Signing Process

The entire APK signing process is located in the `controller -> Apk.php` file. All values are defined randomly.

## Registration

There are two types of users in the system: **Admin** and **Users**.  
Users can register via the "Register" button. They only have download rights.

### Admins

Admins can be defined directly through the MySQL database. They have full access.

## Signing Process Notes

During the signing process, a new signed file is created from the existing unsigned file.  
Each time the "Sign" button is clicked, a new signed file is generated from the unsigned file, and the old one is deleted.  
The system works on a pool mechanism rather than creating individual signed files for each user.

## Recent Updates

I have updated from **CI4 to CI4.5**. If you encounter any issues, please let me know.

## Support

If you need any assistance or have questions about the project, feel free to reach out.  
You can contact me via email at [ibrahim@yilmazca.com](mailto:ibrahim@yilmazca.com) or visit [yilmazca.com](https://yilmazca.com) for more information.
