package edu.unict.unidb.repositories;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.unidb.model.Exam;

public interface ExamRepository extends JpaRepository<Exam, Long> {

}
