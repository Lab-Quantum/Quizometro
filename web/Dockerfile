FROM node:12.18.3-alpine

WORKDIR /web

ENV PATH /web/node_modules/.bin:$PATH

COPY package.json ./
COPY package-lock.json ./
RUN npm install -qy

COPY . ./

CMD ["npm", "start"]
