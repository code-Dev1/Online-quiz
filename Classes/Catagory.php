<?php


class Catagory extends Database
{

    public function index()
    {
        $sql = "SELECT * FROM quizcatagory";
        return $this->exStatment($sql);
    }

    public function add($formData, $image)
    {
        $data = Sanitizer::sanitize($formData);
        $resultFile = File::upload($image);
        if ($resultFile === false) {
            Semej::set('danger', '', 'File uploaded failed.');
            return header('location:dashboard.php?page=quizcatagory');
            die;
        }
        $params = [
            $data['title'],
            $data['description'],
            $resultFile
        ];
        $sql = "INSERT INTO quizcatagory (title,description,image) VALUES (?,?,?)";
        $result = $this->exStatment($sql, $params);
        if ($result < 1) {
            Semej::set('danger', '', 'Insert data failed please try agin later.');
            return header('location:dashboard.php?page=quizcatagory');
            die;
        }
        Semej::set('success', '', 'Insert data successfully completed.');
        return header('location:dashboard.php?page=quizcatagory');
        die;
    }

    public function single($id)
    {
        $id = (int) $id;
        $sql = "SELECT * FROM quizcatagory WHERE cId = ?";
        $param = [$id];
        return $this->exStatment($sql, $param);
    }

    public function up($formData, $id, $image)
    {
        $id = (int) $id;
        $data = Sanitizer::sanitize($formData);
        $params = [
            $data['title'],
            $data['description']
        ];


        // check image path
        $imgSql = "SELECT image FROM quizcatagory WHERE cId = ?";
        $imgParam = [$id];
        $imgPath = $this->exStatment($imgSql, $imgParam);

        // insert new image

        $newImage = File::upload($image);
        $sql = '';
        if ($newImage != false) {
            $params[] = $newImage;
            File::delete($imgPath[0]->image);
            $sql = "UPDATE quizcatagory SET title = ? , description = ? , image = ? WHERE cId = ?";
        } else {
            $sql = "UPDATE quizcatagory SET title = ? , description = ? WHERE cId = ?";
        }
        $params[] = $id;
        $result = $this->exStatment($sql, $params);
        if (!$result) {
            Semej::set('danger', '', 'Catagory updateing faild please try agin later.');
            header('location:dashboard?page=quizcatagory');
            die;
        }
        Semej::set('success', '', 'Catagory successfully updated.');
        header('location:dashboard?page=quizcatagory');
        die;
    }

    public function delete($id)
    {
        $id = (int) $id;
        $param = [$id];
        $sql = "DELETE FROM quizcatagory WHERE cId = ?";
        $result = $this->exStatment($sql, $param);
        if ($result == 0) {
            Semej::set('danger', '', 'Catagory deleting faild please try agin later.');
            header('location:dashboard?page=quizcatagory');
            die;
        }
        Semej::set('success', '', 'Catagory successfully deleted.');
        header('location:dashboard?page=quizcatagory');
        die;
    }

    public function totleCatagory()
    {
        $sql = "SELECT COUNT(cId) as id FROM quizcatagory";
        return $this->exStatment($sql);
    }

    public function indexCatagory()
    {
        $sql = "SELECT * FROM quizcatagory LIMIT 4";
        return $this->exStatment($sql);
    }
}
