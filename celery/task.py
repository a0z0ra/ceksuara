from celery import Celery

app = Celery('tasks', broker='amqp://root@localhost//')

@app.task
def add(x, y):
    return x + y
