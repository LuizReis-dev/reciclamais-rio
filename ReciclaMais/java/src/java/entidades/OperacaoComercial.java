package entidades;

public class OperacaoComercial {

    private int id;
    private Catador catador;
    private Empresa empresa;
    private char tipo;
    private double total;

    public OperacaoComercial() {
    }

    public OperacaoComercial(Catador catador, char tipo, double total) {
        this.catador = catador;
        this.tipo = tipo;
        this.total = total;
    }

    public OperacaoComercial(Empresa empresa, char tipo, double total) {
        this.empresa = empresa;
        this.tipo = tipo;
        this.total = total;
    }

    public int getId() {
        return id;
    }
    public void setId(int id) {
        this.id = id;
    }
    public Catador getCatador() {
        return catador;
    }

    public void setCatador(Catador catador) {
        this.catador = catador;
    }

    public Empresa getEmpresa() {
        return empresa;
    }

    public void setEmpresa(Empresa empresa) {
        this.empresa = empresa;
    }

    public char getTipo() {
        return tipo;
    }

    public void setTipo(char tipo) {
        this.tipo = tipo;
    }

    public double getTotal() {
        return total;
    }

    public void setTotal(double total) {
        this.total = total;
    }
    
    
}

