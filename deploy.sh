#!/bin/bash

# Build the temp branch
git checkout -b deploy-temp

# Run grunt for minification
grunt prod

# Force add minified assets to temp branch
git add wp-content/themes/**/assets/dist --force

git commit -m "Push to staging"
git push staging deploy-temp --force

git rm wp-content/themes/**/assets/dist/theme.min.css --force
git rm wp-content/themes/**/assets/dist/theme.min.css.map --force
git rm wp-content/themes/**/assets/dist/theme.min.js --force
git rm wp-content/themes/**/assets/dist/theme.min.js.map --force

# Go back to your place
git checkout master

# Recreate minified assets
grunt sass
grunt concat

# Delete the temp branch
git branch -D deploy-temp