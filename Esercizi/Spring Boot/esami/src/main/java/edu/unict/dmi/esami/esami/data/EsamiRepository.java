package edu.unict.dmi.esami.esami.data;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import edu.unict.dmi.esami.esami.models.Esame;



@Repository
public interface  EsamiRepository extends  JpaRepository<Esame, Integer>{
    




}
