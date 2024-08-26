FROM ubuntu

RUN apt-get update && \
    apt-get install -y vim wget dialog net-tools nginx && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

RUN rm -v /etc/nginx/nginx.conf

COPY nginx.conf /etc/nginx/

RUN mkdir /etc/nginx/logs

# Create a directory for your web content
RUN mkdir -p /www/data

# Copy all web content to the container
COPY *.html /www/data/
COPY assets/ /www/data/assets/

RUN echo "daemon off;" >> /etc/nginx/nginx.conf

COPY runner.sh /runner.sh
RUN chmod +x /runner.sh

# Ensure Nginx has proper permissions
RUN chmod -R 755 /www/data

EXPOSE 80

ENTRYPOINT ["/runner.sh"]

CMD ["nginx"]