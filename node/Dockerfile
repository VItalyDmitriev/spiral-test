FROM node:latest

WORKDIR /usr/share/nginx/html

RUN npm install

COPY . .

CMD [ "npm", "start" ]

WORKDIR /usr/share/frontend

RUN npm install

COPY . .

RUN npm run dev