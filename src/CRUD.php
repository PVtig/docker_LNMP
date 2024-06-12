<?

interface Test{
	public function get($pdo, $type, $id);
	public function add($pdo, $data, $type);
	public function delete($pdo, $id, $type);
	public function update($pdo, $id, $data, $type);
};