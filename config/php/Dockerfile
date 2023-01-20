### centos7
FROM centos:centos7

ARG APP_DIR

### Set common
RUN yum update -y \
  && yum install -y \
  gcc \
  gcc-c++ \
  gdb \
  zip \
  unzip \
  net-tools \
  bind-utils \
  libXi \
  libXi-devel \
  lsof \
  wget \
  mailx \
  libzip \
  libzip-devel \
  which

RUN yum reinstall -y \
  glibc glibc-common

# locale
RUN localedef -f UTF-8 -i ja_JP ja_JP.UTF-8 \
  && ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime

# locale & timezone
ENV LANG="ja_JP.UTF-8" \
    LANGUAGE="ja_JP:ja" \
    LC_ALL="ja_JP.UTF-8" \
    TZ="Asia/Tokyo"

RUN echo alias ll=\'ls -la\' >> /root/.bashrc

RUN mkdir -m 755 -p ${APP_DIR} \
  && mkdir -m 777 -p /efs \
  && mkdir -m 777 -p /var/log/arecore2

# SELinux
ADD selinux/config /etc/selinux

### Node.js
RUN curl -fsSL https://rpm.nodesource.com/setup_16.x | bash -
RUN yum install -y nodejs

### PHP
RUN yum install -y epel-release
RUN yum -y install http://rpms.remirepo.net/enterprise/remi-release-7.rpm
RUN yum-config-manager --disable 'remi-php*'
RUN yum-config-manager --enable remi-php80
RUN yum -y install php php-fpm php-devel php-mbstring php-mysql php-pdo php-pear php-xml php-opcache php-pecl-zip

# php-fpm
RUN sed -ri 's/^listen = 127\.0\.0\.1:9000/listen = 9000/' /etc/php-fpm.d/www.conf
RUN sed -ri 's/^listen\.allowed_clients = /;listen.allowed_clients = /' /etc/php-fpm.d/www.conf
RUN sed -ri 's/^;request_terminate_timeout/request_terminate_timeout/' /etc/php-fpm.d/www.conf
RUN systemctl enable php-fpm

# Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# Xdebug
RUN pear install pecl/xdebug-3.1.5
COPY ./xdebug.ini /etc/php.d/xdebug.ini

### MySQL Client
RUN rpm --import https://repo.mysql.com/RPM-GPG-KEY-mysql-2022
RUN rpm -Uvh https://dev.mysql.com/get/mysql80-community-release-el7-3.noarch.rpm
RUN yum install -y mysql-community-client

### Java
RUN rpm --import https://yum.corretto.aws/corretto.key
RUN curl -L -o /etc/yum.repos.d/corretto.repo https://yum.corretto.aws/corretto.repo
RUN yum install -y java-17-amazon-corretto-devel

WORKDIR ${APP_DIR}

CMD ["/usr/sbin/init"]
