package edu.unict.moda.Repositories;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.moda.Model.Brand;

public interface BrandRepository extends JpaRepository<Brand, Long> {

}
