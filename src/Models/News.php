<?php

namespace Ductong\XuongOop\Models;

use Ductong\XuongOop\Commons\Helper;
use Ductong\XuongOop\Commons\Model;

class News extends Model
{
    protected string $tableName = 'posts';

    public function fornew()
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->orderBy('luot_xem', 'desc') // Sắp xếp theo lượt xem giảm dần
            ->setMaxResults(4) // Giới hạn kết quả trả về thành 4
            ->fetchAllAssociative();
    }

    public function onenew()
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->orderBy('luot_xem', 'desc') // Sắp xếp theo lượt xem giảm dần
            ->setMaxResults(1) // Giới hạn kết quả trả về thành 1
            ->fetchAllAssociative();
    }

    public function sixnew()
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->orderBy('id', 'desc')
            ->setMaxResults(6)
            ->fetchAllAssociative();
    }

    public function getRandom()
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->orderBy('RAND()')
            ->setMaxResults(4)
            ->fetchAllAssociative();
    }


    public function getProductsByCategory($category_id)
    {
        return $this->queryBuilder
            ->select('p.*, c.name as category_name') // Chọn tất cả các cột từ bảng sản phẩm
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'category', 'c', 'p.category_id = c.id') // Thực hiện INNER JOIN với bảng danh mục
            ->where('c.id = :category_id') // Điều kiện lọc theo ID danh mục
            ->setParameter('category_id', $category_id) // Gán giá trị cho tham số truy vấn
            ->executeQuery() // Thực hiện câu truy vấn
            ->fetchAllAssociative(); // Lấy tất cả kết quả và trả về dưới dạng mảng kết hợp
    }

    public function getViewByCategory()
    {
        return $this->queryBuilder
            ->select("sum(p.luot_xem) as view, c.name")
            ->from("category", "c")
            ->innerJoin("c", "posts", "p", "p.category_id = c.id")
            ->groupBy("p.category_id")
            ->executeQuery()
            ->fetchAllAssociative();
    }

    public function getTotalPostByTimeFromTo($timeFrom, $timeTo)
    {
        return $this->queryBuilder
            ->select("count(p.id) as count, c.name as name")
            ->from("category", "c")
            ->innerJoin("c", "posts", "p", "p.category_id = c.id")
            ->where("p.ngay_xuat_ban >= :timeFrom")
            ->setParameter("timeFrom", $timeFrom)
            ->where("p.ngay_xuat_ban <= :timeTo")
            ->setParameter("timeTo", $timeTo)
            ->groupBy("p.category_id")
            ->executeQuery()
            ->fetchAllAssociative();
    }

    public function getTotalPostByTimeFrom($timeFrom)
    {
        return $this->queryBuilder
            ->select("count(p.id) as count, c.name as name")
            ->from("category", "c")
            ->innerJoin("c", "posts", "p", "p.category_id = c.id")
            ->where("p.ngay_xuat_ban >= :timeFrom")
            ->setParameter("timeFrom", $timeFrom)
            ->groupBy("p.category_id")
            ->executeQuery()
            ->fetchAllAssociative();
    }

    public function getTotalPostByTimeTo($timeTo)
    {
        return $this->queryBuilder
            ->select("count(p.id) as count, c.name as name")
            ->from("category", "c")
            ->innerJoin("c", "posts", "p", "p.category_id = c.id")
            ->where("p.ngay_xuat_ban <= :timeTo")
            ->setParameter("timeTo", $timeTo)
            ->groupBy("p.category_id")
            ->executeQuery()
            ->fetchAllAssociative();
    }

}
