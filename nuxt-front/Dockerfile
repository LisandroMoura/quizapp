FROM node:18-alpine

# Define o diretório de trabalho
WORKDIR /app

# Copia os arquivos de dependências
COPY package*.json ./

# Instala as dependências
# RUN npm install --omit=dev

# Copia o restante do código
COPY . .

# Ajusta permissões para pastas críticas
RUN chown -R node:node /app && chmod -R 775 /app
USER node

# Define o host para permitir acesso externo
ENV NITRO_HOST=0.0.0.0
ENV NITRO_PORT=3000

# Build
# RUN npm run build

# Expõe a porta 3000
EXPOSE 3000

# Início do servidor Nuxt
# CMD ["npm", "run", "preview"]
# CMD ["npm", "run", "preview", "--", "--host", "0.0.0.0"]

# Build e execução do servidor Nuxt em uma única linha
# CMD sh -c "npm run build && npm run preview"
