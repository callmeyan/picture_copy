FROM tutum/lamp:latest
RUN rm -fr /app
COPY app /app
EXPOSE 80 3306
CMD ["/run.sh"]