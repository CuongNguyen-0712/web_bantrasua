<?php

namespace admin;

class Product_Model extends Base_Model
{
    public function getProductsByPage($limit, $offset)
    {
        $query = "SELECT p.id, p.name, p.cost_default, c.name AS category, p.upload_time, p.img_url AS img, p.is_active
        FROM product p
        JOIN category c ON p.category_id = c.id
        LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getTotalProducts()
    {
        $query = "SELECT COUNT(*) AS total FROM product";
        $result = $this->select($query);
        return $result[0]['total'] ?? 0;
    }

    public function getAllSizes()
    {
        return $this->select("SELECT * FROM size");
    }

    public function getCategoryIdByName($name)
    {
        $query = "SELECT id FROM category WHERE name = :name";
        $result = $this->select($query, [':name' => $name]);
        return $result[0]['id'] ?? null;
    }

    public function insertProduct($name, $categoryId, $costDefault, $description, $imgPath)
    {
        $query = "INSERT INTO product (name, category_id, cost_default, description, img_url)
                  VALUES (:name, :category_id, :cost_default, :description, :img_url)";
        return $this->insert($query, [
            ':name' => $name,
            ':category_id' => $categoryId,
            ':cost_default' => $costDefault,
            ':description' => $description,
            ':img_url' => $imgPath,
        ]);
    }

    public function insertProductSize($productId, $sizeId, $price)
    {
        $query = "INSERT INTO product_size (product_id, size_id, cost) VALUES (:product_id, :size_id, :price)";
        return $this->insert($query, [
            ':product_id' => $productId,
            ':size_id' => $sizeId,
            ':price' => $price,
        ]);
    }

    public function getAllCategories()
    {
        return $this->select("SELECT * FROM category");
    }

    public function getProductById($productId)
    {
        $query = "SELECT p.id, p.name, p.cost_default, p.category_id, p.upload_time, c.name AS category, p.description, p.img_url AS img, p.is_active
                  FROM product p
                  JOIN category c ON p.category_id = c.id
                  WHERE p.id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id', $productId, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getProductSizes($productId)
    {
        $query = "SELECT ps.size_id, ps.cost FROM product_size ps WHERE ps.product_id = :product_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':product_id', $productId, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_KEY_PAIR); // trả về mảng [size_id => cost]
    }

    public function updateProduct($productId, $name, $categoryId, $costDefault, $description, $imgPath, $active)
    {
        $query = "UPDATE product SET name = :name, category_id = :category_id, cost_default = :cost_default, description = :description, img_url = :img_url, is_active = :is_active WHERE id = :id";
        return $this->update($query, [
            ':id' => $productId,
            ':name' => $name,
            ':category_id' => $categoryId,
            ':cost_default' => $costDefault,
            ':description' => $description,
            ':img_url' => $imgPath,
            ':is_active' => $active,
        ]);
    }

    public function updateProductSize($productId, $sizeId, $price)
    {
        $query = "UPDATE product_size SET cost = :price WHERE product_id = :product_id AND size_id = :size_id";
        return $this->update($query, [
            ':product_id' => $productId,
            ':size_id' => $sizeId,
            ':price' => $price,
        ]);
    }

    public function hasBeenSold($productId)
    {
        $query = "SELECT COUNT(*) FROM order_details WHERE product_id = :product_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':product_id' => $productId]);
        return $stmt->fetchColumn() > 0;
    }

    public function deactivateProduct($productId)
    {
        $query = "UPDATE product SET is_active = '0' WHERE id = :id";
        return $this->update($query, [':id' => $productId]);
    }

    public function deleteProduct($productId)
    {
        $query1 = "DELETE FROM product_size WHERE product_id = :id";
        $this->delete($query1, [':id' => $productId]);

        $query2 = "DELETE FROM product WHERE id = :id";
        return $this->delete($query2, [':id' => $productId]);
    }
}