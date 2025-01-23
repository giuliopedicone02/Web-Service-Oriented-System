package edu.unict.unidb.repositories;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.unidb.model.Exam;
import edu.unict.unidb.model.Student;

public interface StudentRepository extends JpaRepository<Student, Long> {
    List<Student> findByExamId(Exam examId);
}
