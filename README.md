# Fitzen - Scalable and Optimized Blog

**Fitzen** started as a free HTML5 theme but has evolved into a complete platform for article management, optimized for SEO and efficient usage.

---

## **Key Features**

### **Responsive and Scalable Design**
- HTML5 theme optimized for desktop, tablet, and mobile devices.
- High performance and fast loading speed.
- **Zoom In and Zoom Out buttons** for mobile devices, providing a simple and effective solution to avoid small text issues.

### **Management Dashboard**
- Add and edit articles from a **dedicated dashboard**.
- Comment moderation system directly from the admin panel.

### **Multi-Part Articles**
- Ability to add **additional parts** to an existing article.
- PHP automatically generates a **navigation button** to the next part.

### **Tracking & Analytics**
- **IP storage** in SQL to count **the number of views** per article.
- Views are displayed on the page for transparency.

### **Rating System (Star Voting)**
- Implemented in **JavaScript**, allowing users to vote for articles with stars.
- Spam protection: each user can vote **only once** (tracked via IP).

### **SEO & Optimization**
- **Automatic metadata generation**: PHP extracts the article title and fills in **meta tags** automatically.
- The site has been tested and achieved an **SEO score of 100**.
- Includes a **sitemap** for more efficient indexing by search engines.

---

## **Technologies Used**
- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP, MySQL
- **SEO:** Meta tag optimization, sitemap
- **Tracking & Analytics:** IP storage, view count
- **Interactivity:** JavaScript voting system, article navigation
- **Mobile Optimization:** Media Queries, Zoom In/Out buttons

---

## **Installation & Configuration**
1. Clone the repository:
   ```sh
   git clone https://github.com/your-username/fitzen.git
   ```
2. Import the SQL database into your MySQL server.
3. Configure the SQL connection in the `config.php` file:
   ```php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "fitzen";
   ```
4. Upload the files to a server that supports PHP & MySQL.
5. Access the dashboard for management.

---

## **License & Rights**
- The base theme is **free and open-source**.
- The modified code is **available for use and further development**.

  **Fitzen is not just a simple website but an advanced content management system!**

