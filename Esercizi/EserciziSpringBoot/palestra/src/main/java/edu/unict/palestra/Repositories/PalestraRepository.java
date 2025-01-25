package edu.unict.palestra.Repositories;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.palestra.Models.Palestra;

public interface PalestraRepository extends JpaRepository<Palestra, Long> {

}
