# Dockerfile to build Nginx Installed Containers
# Based on Ubuntu

# Set the base image to Ubuntu
FROM ubuntu

# File Author / Maintainer
MAINTAINER Karthik Gaekwad

# Update the repository and install Nginx
RUN apt-get update && \
    apt-get install -y vim wget dialog net-tools nginx && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Remove the default Nginx configuration file
RUN rm -v /etc/nginx/nginx.conf

# Copy a configuration file from the current directory
COPY nginx.conf /etc/nginx/

RUN mkdir /etc/nginx/logs

# Create a directory for your web content
RUN mkdir -p /www/data

# Copy all HTML files to the container
COPY *.html /www/data/

# Copy the assets directory
COPY assets/ /www/data/assets/

# If you have other directories or files, add them here
# COPY other_directory/ /www/data/other_directory/
# COPY other_file.ext /www/data/

# Append "daemon off;" to the beginning of the configuration
RUN echo "daemon off;" >> /etc/nginx/nginx.conf

# Create a runner script for the entrypoint
COPY runner.sh /runner.sh
RUN chmod +x /runner.sh

# Expose ports
EXPOSE 80

ENTRYPOINT ["/runner.sh"]

# Set the default command to execute
# when creating a new container
CMD ["nginx"]