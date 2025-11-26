# 🚀 Guide de Déploiement Netlify

## ❌ Problème : "Page Not Found"

Si tu vois cette erreur sur Netlify, voici les solutions :

---

## ✅ Solution 1 : Vérifier la structure des fichiers

Sur Netlify, tu dois avoir **UNIQUEMENT** ces fichiers :

```
📁 Ton dossier/
  ├── index.html          ← FICHIER PRINCIPAL (obligatoire)
  ├── netlify.toml        ← Configuration Netlify
  └── _redirects          ← Fichier de redirection
```

**❗ IMPORTANT** : 
- Ne mets **QUE** ces 3 fichiers
- Les autres fichiers (qcm.html, resultat.html, admin.html) ne sont PAS nécessaires car tout est dans index.html

---

## ✅ Solution 2 : Méthode de déploiement

### 🔷 Option A : Drag & Drop (le plus simple)

1. **Va sur** : https://app.netlify.com/drop
2. **Crée un nouveau dossier vide** sur ton PC
3. **Copie UNIQUEMENT** ces 3 fichiers dedans :
   - `index.html`
   - `netlify.toml`
   - `_redirects`
4. **Glisse-dépose** le dossier sur Netlify
5. **C'est tout !** ✅

### 🔷 Option B : Via le Dashboard

1. **Connecte-toi** sur https://app.netlify.com
2. Clique sur **"Add new site"** → **"Deploy manually"**
3. **Glisse ton dossier** (avec les 3 fichiers)
4. Attends le déploiement
5. Teste ton site !

---

## ✅ Solution 3 : Vérifier les paramètres Netlify

Si le problème persiste :

1. Va dans **Site settings** sur Netlify
2. Dans **Build & deploy** → **Build settings**
3. Vérifie que :
   - **Publish directory** = `.` (ou vide)
   - **Build command** = vide

---

## ✅ Solution 4 : Fichier de configuration Netlify

Le fichier **netlify.toml** doit contenir :

```toml
[build]
  publish = "."

[[redirects]]
  from = "/*"
  to = "/index.html"
  status = 200
```

Le fichier **_redirects** doit contenir :

```
/*    /index.html   200
```

Ces fichiers disent à Netlify de toujours servir `index.html` pour toutes les URLs.

---

## ✅ Solution 5 : Vider le cache Netlify

Si tu as déjà déployé avant :

1. Va dans **Deploys** sur Netlify
2. Clique sur **"Trigger deploy"**
3. Sélectionne **"Clear cache and deploy site"**
4. Attends quelques secondes
5. Teste à nouveau

---

## 🔍 Checklist de débogage

- [ ] Le fichier s'appelle bien `index.html` (pas `Index.html` ou autre)
- [ ] Tu as bien le fichier `netlify.toml` ou `_redirects`
- [ ] Tu n'as pas d'autres fichiers qui pourraient causer des conflits
- [ ] Le déploiement est terminé (100%)
- [ ] Tu as vidé le cache de ton navigateur (Ctrl+F5)

---

## 🎯 Structure recommandée finale

```
📁 qcm-stockage/
  ├── index.html       ← Tout le QCM (18 Ko)
  ├── netlify.toml     ← Config Netlify
  └── _redirects       ← Redirections
```

**Total** : 3 fichiers seulement !

---

## 💡 Test en local avant de déployer

Pour tester en local si tout fonctionne :

1. Ouvre simplement `index.html` dans ton navigateur
2. Fais le QCM
3. Vérifie que les résultats s'affichent
4. Teste la page admin avec le mot de passe : `ewenlegoat123`

Si tout marche en local, ça marchera sur Netlify ! ✅

---

## 🆘 Toujours pas résolu ?

Si le problème persiste :

1. **Supprime complètement** ton site sur Netlify
2. **Crée un nouveau site**
3. **Glisse UNIQUEMENT** le fichier `index.html`
4. Teste

Si ça marche avec juste index.html, alors rajoute les autres fichiers de config.

---

## 📱 Contact Support Netlify

Si vraiment rien ne fonctionne :
- Forum : https://answers.netlify.com/
- Docs : https://docs.netlify.com/

---

**Bonne chance !** 🚀

PS : La cause la plus fréquente est d'avoir uploadé les mauvais fichiers ou d'avoir plusieurs versions de index.html.
