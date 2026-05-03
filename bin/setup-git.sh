#!/bin/bash
set -e

cd /data/www

# Set up SSH key from environment variable (base64 encoded)
mkdir -p ~/.ssh
echo "$GITHUB_DEPLOY_KEY" | base64 -d > ~/.ssh/github_deploy
chmod 600 ~/.ssh/github_deploy

cat > ~/.ssh/config << EOF
Host github.com
  IdentityFile ~/.ssh/github_deploy
  StrictHostKeyChecking no
EOF

# Configure git identity
git config --global user.email "panel@sincere.studio"
git config --global user.name "Sincere Studio Panel"

# Init repo if not already
if [ ! -d .git ]; then
  git init
  git remote add origin git@github.com:ldanielswakman/sincere-studio.git
  git fetch
  git checkout -f main
  git branch --set-upstream-to=origin/main main
fi

# Write Kirby license from environment variable
if [ -n "$KIRBY_LICENSE" ]; then
  echo "$KIRBY_LICENSE" | base64 > /data/www/site/config/.license
  chmod 600 /data/www/site/config/.license
fi