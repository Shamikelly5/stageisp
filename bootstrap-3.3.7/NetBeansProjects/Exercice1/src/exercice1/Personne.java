/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package exercice1;

import java.util.Date;

/**
 *
 * @author Kavota
 */
public  class Personne {
    private String nom;
    private String postnom;
    private Date dNaiss; 
    private String sexe;
    public Personne(String nom, String postnom, Date dNaiss, String sexe) {
        this.nom = nom;
        this.postnom = postnom;
        this.dNaiss = dNaiss;
        this.sexe = sexe;
    }
    public Personne() {
    }

    public Personne(String nom, String postnom) {
        this.nom = nom;
        this.postnom = postnom;
        this.setSexe("F");
        this.setdNaiss(new Date());
    }
    
    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getPostnom() {
        return postnom;
    }

    public void setPostnom(String postnom) {
        this.postnom = postnom;
    }

    public Date getdNaiss() {
        return dNaiss;
    }

    public void setdNaiss(Date dNaiss) {
        this.dNaiss = dNaiss;
    }

    public String getSexe() {
        return sexe;
    }

    public void setSexe(String sexe) {
        this.sexe = sexe;
    }
    
}
