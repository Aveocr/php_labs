<?php
class Driver extends Employee {
    private $drive_experience = [];

    public function get_drive_experience(): array {
        return $this->drive_experience;
    }

    public function get_experience_by_category(string $category):  int {
        return $this->drive_experience[strtoupper($category)] ?? null;
    }

    public function set_drive_experience(int $drivingExperience, string $drivingCategory): void {
        $validCategories = ['A', 'B', 'C', 'D'];
        $category = strtoupper($drivingCategory);

        if ($drivingExperience < 0) {
            throw new InvalidArgumentException("Опыт вождения не может быть отрицательным");
        }

        if (!in_array($category, $validCategories)) {
            throw new InvalidArgumentException("Недопустимая категория вождения. Допустимые значения: A, B, C, D");
        }

        $this->drive_experience[$category] = $drivingExperience;
    }
}
?>