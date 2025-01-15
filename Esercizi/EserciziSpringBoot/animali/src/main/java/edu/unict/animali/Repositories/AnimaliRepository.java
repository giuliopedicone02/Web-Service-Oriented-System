package edu.unict.animali.Repositories;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.animali.Models.Animali;

public interface AnimaliRepository extends JpaRepository<Animali, Long> {

}
