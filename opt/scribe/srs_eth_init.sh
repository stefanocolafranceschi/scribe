sudo /etc/init.d/iptables stop

sudo /sbin/ifconfig eth1 10.0.0.3 netmask 255.255.255.0 mtu 9000
sudo /sbin/ifconfig eth1:1 10.0.3.3 netmask 255.255.255.0 mtu 9000
sudo /sbin/ifconfig eth1:2 10.0.7.3 netmask 255.255.255.0 mtu 9000
#sudo /sbin/ifconfig eth1:3 10.0.8.3 netmask 255.255.255.0 mtu 9000
#sudo /sbin/ifconfig eth1:4 10.0.9.3 netmask 255.255.255.0 mtu 9000
sudo hostname localhost
/sbin/ifconfig
