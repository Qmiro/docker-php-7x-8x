# From
FROM php:7.1.5-fpm-alpine

# Set timezone
ENV TZ=${TZ:-UTC}
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Install non-dev dependencies
RUN set -eux \
  && apk add --no-cache \
  git vim zip unzip bash curl tzdata icu-libs \
  c-client make ca-certificates \
  libxslt libpng libwebp libjpeg-turbo freetype

  # Install dependencies
RUN set -eux \
  && apk add --no-cache --virtual .build_deps \
  libpng-dev libwebp-dev libjpeg-turbo-dev freetype-dev \
  libxslt-dev postgresql-dev \
  $PHPIZE_DEPS \
  \
  # Php extensions
  && docker-php-ext-install \
  mysqli \
  pdo_mysql \
  pdo_pgsql \
  pgsql \
  bcmath \
  gd \
  exif \
  soap \
  xsl \
  pcntl \
  sockets \
  sysvmsg \
  sysvsem \
  sysvshm \
  calendar

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# ionCube loader
#RUN cd /tmp \
#	&& curl -o ioncube.tar.gz http://downloads3.ioncube.com/loader_downloads/ioncube_loaders_lin_x86-64.tar.gz \
#  && tar -xvvzf ioncube.tar.gz \
#  && mv ioncube/ioncube_loader_lin_7.1.so /usr/local/lib/php/extensions/* \
#  && rm -Rf ioncube.tar.gz ioncube \
#  && echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20230831/ioncube_loader_lin_7.1.so" > /usr/local/etc/php/conf.d/00_docker-php-ext-ioncube_loader_lin_7.1.ini

# Copy php settings
COPY ./php.ini ${PHP_INI_DIR}/conf.d/99-php.ini

# Copy entrypoint
#COPY ./entrypoint /usr/local/bin/docker-entrypoint
#RUN chmod +x /usr/local/bin/docker-entrypoint

# Workdir
ENV WORKDIR=/var/www/app
RUN mkdir -p ${WORKDIR}
WORKDIR ${WORKDIR}

# Expose port
EXPOSE 9000

# Run entrypoint
#CMD ["docker-entrypoint"]
