# Deployment

Northenbridge College CTF runs inside a Vagrant-managed Ubuntu VM. The VM hosts the complete website and database, so player devices only need a web browser.

## Requirements

The host machine needs:

* VirtualBox
* Vagrant
* Git
* A local network that the player devices can access

The player devices do not need Vagrant, VirtualBox or the project files.

## Starting the VM

Clone the repository and start the VM:

```bash
git clone <repository-url>
cd northenbridge-ctf
vagrant up
```

Vagrant installs the required packages, configures Apache and prepares the SQLite database using the provisioning script.

After the VM has started, check its network address:

```bash
vagrant ssh
hostname -I
```

The VM should have an IP address on the same network as the host machine.

For example:

```text
192.168.1.50
```

The exact address depends on the local network.  
</br>  
## Bridged Networking

The VM uses bridged networking for the CTF deployment.

```text
Player 1 ─┐
Player 2 ─┤
Player 3 ─┼── Local Network ──> CTF Host ──> Ubuntu VM
Player N ─┘                              └──> Apache
```

Only the machine running the VM needs to run the website.

Players connect to the VM's network address:

```text
http://<VM-IP>/

#For example:
http://192.168.1.50/
```

The IP address should be checked after starting the VM rather than assuming a particular address.  
</br>

## Apache

Apache listens on port `80` inside the VM.

The project uses the `northenbridge` Apache virtual host and serves the application from:

```text
/var/www/northenbridge
```

The student portal and admin portal are hosted by the same Apache instance.  
</br>  

## Player Access

Once the VM is running, test the website from the host first:

```text
http://<VM-IP>/
```

Then test the same address from another device connected to the same network.

If the second device cannot connect, check:

* The VM received a LAN IP address.
* The host and player device are on the same network.
* The network does not have client/AP isolation enabled.
* Apache is running.
* Port `80` is not being blocked by the host or VM firewall.

The `northenbridge.local` Apache `ServerName` does not automatically create DNS for player devices, so using the VM's IP address is the simplest option for the CTF.  
</br>  

## Resetting the Lab

The project uses `seed.sql` to create the initial database and challenge data.

For a fresh environment, destroy and recreate the VM:

```bash
vagrant destroy -f
vagrant up
```

Do not reprovision or reset the database while players are using the CTF, as this can reset their progress and records.  
</br>  

## Stopping the Lab

To stop the VM without removing it:

```bash
vagrant halt
```

Start it again with:

```bash
vagrant up
```

To completely remove the VM:

```bash
vagrant destroy -f
```

The project files remain on the host because they are stored in the repository and shared with the VM.
