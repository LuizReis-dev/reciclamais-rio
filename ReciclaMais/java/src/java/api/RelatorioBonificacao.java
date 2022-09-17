
package api;


public class RelatorioBonificacao {
    
     private int id_catador;
    private int id_material;
    private double total_vendido;
    private double meta_bonificacao_kg;

    public int getId_catador() {
        return id_catador;
    }

    public void setId_catador(int id_catador) {
        this.id_catador = id_catador;
    }

    public int getId_material() {
        return id_material;
    }

    public void setId_material(int id_material) {
        this.id_material = id_material;
    }

    public double getTotal_vendido() {
        return total_vendido;
    }

    public void setTotal_vendido(double total_vendido) {
        this.total_vendido = total_vendido;
    }

    public double getMeta_bonificacao_kg() {
        return meta_bonificacao_kg;
    }

    public void setMeta_bonificacao_kg(double meta_bonificacao_kg) {
        this.meta_bonificacao_kg = meta_bonificacao_kg;
    }
}
