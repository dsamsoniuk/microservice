# Build stage
FROM node:lts-alpine AS build-stage

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build

# Production stage
FROM nginx:alpine AS production-stage

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]