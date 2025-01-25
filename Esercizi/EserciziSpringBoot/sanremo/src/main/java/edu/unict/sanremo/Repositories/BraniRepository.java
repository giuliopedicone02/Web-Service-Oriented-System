package edu.unict.sanremo.Repositories;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.sanremo.Models.Brani;

public interface BraniRepository extends JpaRepository<Brani, Long> {
    List<Brani> findByTitleContainingIgnoreCase(String title);
}
