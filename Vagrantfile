Vagrant.configure("2") do |config|

  config.vm.box = "bento/ubuntu-24.04"
  config.vm.boot_timeout = 600
  config.vm.hostname = "northenbridge"

  # Access website from Windows:
  # http://localhost:8080
  config.vm.network "public_network"

  # share application directory with the VM
  config.vm.synced_folder ".", "/vagrant"
  config.vm.synced_folder "./www","/var/www/northenbridge"

  config.vm.provider "virtualbox" do |vb|
    vb.name = "northenbridge-ctf"
    vb.memory = 2048
    vb.cpus = 2
  end

  config.vm.provision "shell",
                      path: "provision.sh"

end