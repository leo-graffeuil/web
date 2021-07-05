FROM wordpress:latest

# Install Composer v2
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Install Node + npm
RUN curl -sL https://deb.nodesource.com/setup_16.x  | bash -
RUN apt-get -y install nodejs
RUN npm install -g yarn

