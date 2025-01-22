package edu.unict.unidb.repositories;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.unidb.model.Student;

public interface StudentRepository extends JpaRepository<Student, Long> {

}
